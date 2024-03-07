document.addEventListener('DOMContentLoaded', function() {
  const applyFiltersButton = document.getElementById('apply-filters');
  const resetFiltersButton = document.getElementById('reset-filters');
  let currentPage = 1;

  function showLoader() {
    document.querySelector('.loader-container').style.display = 'flex';
  }

  function hideLoader() {
    document.querySelector('.loader-container').style.display = 'none';
  }

  function fetchFilteredProducts(filters, resetPagination = false) {
    showLoader();
    if (resetPagination) {
      currentPage = 1;
    }
    fetch('/wp-admin/admin-ajax.php', {
      method: 'POST',
      credentials: 'same-origin',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: `action=filter_products&filters=${encodeURIComponent(JSON.stringify(filters))}&page=${currentPage}`
    })
      .then(response => response.json())
      .then(data => {
        const productsGrid = document.querySelector('.products-grid');
        if (resetPagination) {
          productsGrid.innerHTML = data.html;
        } else {
          productsGrid.insertAdjacentHTML('beforeend', data.html);
        }
        if (!data.html.trim().length || currentPage >= data.maxPages) {
          document.getElementById('load-more-products').style.display = 'none';
        } else {
          document.getElementById('load-more-products').style.display = 'block';
          document.getElementById('load-more-products').setAttribute('data-page', currentPage.toString());
        }
      })
      .catch(error => console.error('Error:', error))
      .finally(() => {
        hideLoader();
      });
  }

  function getSelectedFilters() {
    let filters = {
      gender: [],
      product_cat: [],
      size: [],
      color: [],
      bon_plans: []
    };

    document.querySelectorAll('input[name="gender"]:checked').forEach(input => {
      filters.gender.push(input.value);
    });
    document.querySelectorAll('input[name="product_cat"]:checked').forEach(input => {
      filters.product_cat.push(input.value);
    });
    document.querySelectorAll('input[name="size"]:checked').forEach(input => {
      filters.size.push(input.value);
    });
    document.querySelectorAll('input[name="color"]:checked').forEach(input => {
      filters.color.push(input.value);
    });
    let bonPlansInput = document.querySelector('input[name="bon_plans"]:checked');
    if (bonPlansInput) {
      filters.bon_plans = bonPlansInput.value;
    }
    return filters;
  }

  applyFiltersButton.addEventListener('click', function() {
    const filters = getSelectedFilters();
    console.log(filters)
    fetchFilteredProducts(filters, true);
  });
  resetFiltersButton.addEventListener('click', function() {
    document.querySelectorAll('.filter-option-radio').forEach(input => {
      if (input.type === "radio") {
        input.checked = input.value === "all";
      } else if(input.type === "checkbox") {
        input.checked = false;
      }
      input.parentElement.classList.remove('active');
    });
    fetchFilteredProducts({}, true);
  });

  document.querySelectorAll('.rapid_variations_form').forEach(function(form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      var selectedSize = this.querySelector('input[name="variation_size"]:checked');
      var errorMsg = this.closest('.relative').querySelector('.product-error-msg');
      var variationId = this.querySelector('.variation_id').value; // Récupérer l'ID de variation sélectionné

      if (!selectedSize) {
        errorMsg.textContent = 'Veuillez choisir une taille avant d\'ajouter au panier.';
        errorMsg.classList.add('!translate-y-0');
      } else {
        errorMsg.textContent = '';
        errorMsg.classList.remove('!translate-y-0');

        var data = {
          action: 'woocommerce_ajax_add_to_cart',
          product_id: this.querySelector('[name="product_id"]').value,
          variation_id: variationId,
        };
        fetch('/wp-admin/admin-ajax.php', {
          method: 'POST',
          credentials: 'same-origin',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: new URLSearchParams(data).toString()
        })
          .then(response => response.json())
          .then(response => {
            if (response.error && response.product_url) {
              window.location = response.product_url;
              return;
            }
            console.log('Produit ajouté avec succès');
          });
      }
    });
  });

  document.getElementById('load-more-products').addEventListener('click', function() {
    currentPage++;
    const filters = getSelectedFilters();
    fetchFilteredProducts(filters);
  });
});

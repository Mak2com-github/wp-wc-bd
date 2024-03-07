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

  // Fonction pour récupérer et afficher les produits filtrés
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
          productsGrid.innerHTML = data.html; // Remplace les produits existants par les nouveaux filtrés
        } else {
          productsGrid.insertAdjacentHTML('beforeend', data.html); // Ajoute les produits chargés à la liste existante
        }

        if (!data.html.trim().length || currentPage >= data.maxPages) {
          document.getElementById('load-more-products').style.display = 'none'; // Cache le bouton s'il n'y a plus de produits à charger
        } else {
          document.getElementById('load-more-products').style.display = 'block';
          document.getElementById('load-more-products').setAttribute('data-page', currentPage.toString());
        }
      })
      .catch(error => console.error('Error:', error))
      .finally(() => {
        hideLoader(); // Masquer le loader une fois la requête terminée
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

  // Écouteur pour le bouton Appliquer les filtres
  applyFiltersButton.addEventListener('click', function() {
    const filters = getSelectedFilters();
    console.log(filters)
    fetchFilteredProducts(filters, true);
  });

  // Écouteur pour le bouton Réinitialiser les filtres
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


  document.getElementById('load-more-products').addEventListener('click', function() {
    currentPage++;
    const filters = getSelectedFilters();
    fetchFilteredProducts(filters);
  });
});

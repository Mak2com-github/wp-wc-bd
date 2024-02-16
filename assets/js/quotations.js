function quoteStorage() {
  document.getElementById('addToQuote').addEventListener('click', function(event) {
    event.preventDefault();

    const button = this;
    const productId = button.getAttribute('data-product-id');
    const productName = button.getAttribute('data-product-name');
    const productImage = button.getAttribute('data-product-image');
    const productLink = button.getAttribute('data-product-link');
    const quantity = document.getElementById('quantity').value;
    const uniqueId = Date.now();
    const productDetails = {
      uniqueId: uniqueId,
      productId: productId,
      productName: productName,
      imageUrl: productImage,
      link: productLink,
      quantity: quantity,
      options: {}
    };

    document.querySelectorAll('#proProductOptions .form-option input:checked, #proProductOptions input[type="number"]').forEach(function(input) {
      productDetails.options[input.name] = input.value;
    });

    let devis = localStorage.getItem('devis');
    if (devis) {
      devis = JSON.parse(devis);
    } else {
      devis = [];
    }
    devis.push(productDetails);
    localStorage.setItem('devis', JSON.stringify(devis));

    updatePopupDevis()
    togglePopupDevis();
  });
}

function updatePopupDevis() {
  const devis = JSON.parse(localStorage.getItem('devis') || '[]');
  const devisItemsContainer = document.getElementById('devisItems');
  devisItemsContainer.innerHTML = '';
  if (devis.length > 0) {
    devis.forEach((item) => {
      const productElement = document.createElement('div');
      productElement.className = 'devis-item relative flex flex-row justify-between my-4';
      productElement.innerHTML = `
                <div class="w-[100px] bg-light-grey">
                <img src="${item.imageUrl}" alt="${item.productName}" />
                </div>
                <div class="flex flex-col justify-center mr-auto ml-4">
                <p class="font-title uppercase text-deep-green font-base font-bold">${item.productName}</p>
                <p class="font-title uppercase text-deep-green font-xs font-light"><span>Quantité : </span><span class="font-medium">${item.quantity}</span></p>
                <a class="lg:hidden font-title uppercase text-deep-green font-xs font-bold underline" href="${item.link}">Modifier</a>
                </div>
                <div class="flex flex-row justify-center items-center">
                <a class="hidden font-title uppercase text-deep-green font-xs font-bold underline" href="${item.link}">Modifier</a>
                <button class="" onclick="deleteProduct('${item.uniqueId}')">
                <img class="w-[18px]" src="/wp-content/themes/mak2com/assets/svg/trash.svg" alt="icone de corbeille">
                </button>
                </div>
            `;
      devisItemsContainer.appendChild(productElement);
    });
  } else {
    devisItemsContainer.innerHTML = `<p class="font-sans text-deep-green text-center">Aucun produits ajoutés au devis</p>`;
  }
}

function togglePopupDevis() {
  const body = document.querySelector('body');
  const popup = document.getElementById('quotePopup');
  popup.classList.toggle('!translate-x-0')
  body.classList.toggle('overflow-hidden')
}

function deleteProduct(uniqueId) {
  let devis = JSON.parse(localStorage.getItem('devis') || '[]');
  const updatedDevis = devis.filter(item => item.uniqueId != uniqueId);
  localStorage.setItem('devis', JSON.stringify(updatedDevis));
  updatePopupDevis();
}

function preselectOptions() {
  const currentProductId = document.querySelector('.pro-single-page').getAttribute('data-product-id');
  const devis = JSON.parse(localStorage.getItem('devis') || '[]');

  const productInDevis = devis.find(item => item.productId === currentProductId);
  if (productInDevis) {
    document.getElementById('quantity').value = productInDevis.quantity;
    Object.keys(productInDevis.options).forEach(optionName => {
      const optionValue = productInDevis.options[optionName];
      const input = document.querySelector(`input[name="${optionName}"][value="${optionValue}"]`);
      if (input) {
        input.checked = true;
      }
    });
  }
}

document.addEventListener("DOMContentLoaded", function () {
  let body = document.querySelector('body')
  if (body.classList.contains('single-produit-pro')) {
    preselectOptions()
  }
  quoteStorage()
  updatePopupDevis()
})
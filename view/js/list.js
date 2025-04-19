
function openModalUpdate(productId) {
  let modal = document.getElementById("modal");
  modal.classList.remove("hidden");
  modal.classList.add("flex");

  // Mettre à jour l'ID du produit dans le bouton de confirmation
  document
    .querySelector('[onclick="confirmDelete(this)"]')
    .setAttribute("data-id", productId);
}

function closeModalUpdate() {
  let modal = document.getElementById("modal");
  modal.classList.add("hidden");
  modal.classList.remove("flex");
}



function Update(button) {
  let productId = button.getAttribute("data-id");

  fetch(`../controller/modification.php?id=${productId}`, {
    method: "GET",
  })
    .then((response) => response.text())
    .then((data) => {
      console.log("Produit modifié:", data);

      // Ferme le modal
      closeModalUpdate();

      // Trouver l'élément produit avec l'ID et le supprimer
      let productElement = document.getElementById(`product-${productId}`);
      if (productElement) {
        productElement.Update();
      } else {
        console.error(
          `L'élément avec l'ID product-${productId} n'a pas été trouvé.`
        );
      }
    })
    .catch((error) => console.error("Erreur suppression :", error));
}

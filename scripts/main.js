document.addEventListener("DOMContentLoaded", function () {
  const deleteButtons = document.querySelectorAll(".btn-eliminar");
  const idHiddenInput = document.getElementById("item-id-to-delete");
  const entitieHiddenInput = document.getElementById("item-entitie-to-delete");

  deleteButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const equipmentId = this.getAttribute("data-id");
      const entite = this.getAttribute("data-entitie");

      idHiddenInput.value = equipmentId;
      entitieHiddenInput.value = entite;

      console.log("aqui llego el fukin id -> ", equipmentId);
      console.log("aqui llego el fukin id -> ", entite);
    });
  });
});

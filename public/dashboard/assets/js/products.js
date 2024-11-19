document.addEventListener("DOMContentLoaded", function() {
    // Get the prices for Sales Type
    $('#form-sales').on('shown.bs.modal', function() {
        const defaultPriceInput = document.getElementById("default-price");
        const defaultPrice = defaultPriceInput ? defaultPriceInput.value : "";

        document.querySelectorAll('input[name^="prices["]').forEach(input => {
            if (!input.value) {
                input.value = defaultPrice;
            }
        });
    });
    
    // Materials
    const addMaterialButton = document.getElementById("add-material");
    const materialSelector = document.getElementById("material-selector");
    const materialsTableBody = document.querySelector("#selected-materials-table tbody");

    addMaterialButton.addEventListener("click", function() {
        // Get the selected material
        const selectedOption = materialSelector.options[materialSelector.selectedIndex];

        if (!selectedOption.value) {
            alert("Pilih bahan terlebih dahulu!");
            return;
        }

        const materialId = selectedOption.value;
        const materialTitle = selectedOption.getAttribute("data-title");
        const materialUnit = selectedOption.getAttribute("data-unit");

        // Check if the material is already in the table
        if (document.getElementById(`material-row-${materialId}`)) {
            alert("Bahan sudah ditambahkan ke komposisi!");
            return;
        }

        // Add material row to table
        const row = document.createElement("tr");
        row.id = `material-row-${materialId}`;
        row.innerHTML = `
            <td>${materialTitle}</td>
            <td>
                <input type="number" name="materials[${materialId}][quantity]" class="form-control form-control-sm" placeholder="Masukan Jumlah" value="1" min="1" required>
            </td>
            <td>${materialUnit}</td>
            <td>
                <button type="button" class="btn btn-light btn-sm" onclick="removeMaterial(${materialId})"><i class="ti-trash text-danger"></i> Hapus</button>
                <input type="hidden" name="materials[${materialId}][id]" value="${materialId}">
            </td>
        `;

        materialsTableBody.appendChild(row);

        // Reset dropdown after materials added
        materialSelector.value = "";
    });
});

function removeMaterial(materialId) {
    const row = document.getElementById(`material-row-${materialId}`);
    if (row) {
        row.remove();
    }
}
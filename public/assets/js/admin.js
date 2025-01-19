$(document).ready(function () {
    /**
     * Not working because the buttons are dynamically added, so we use EVENT DELEGATION: 
     * If you instead directly bind the event using $('.btn-primary').click(...), 
     * it will only work for .btn-primary elements that exist at the time the handler is assigned. 
     * Any new buttons added after that won't trigger the click event. 
     * By attaching the event handler to a parent container (like #gift-list), you avoid potential duplication of code and ensure maintainability. You don't have to re-bind click handlers every time you update or replace the .btn-primary elements.
     * So $('.reject-btn').on('click', function(e){}) Won't work 
     */        

    // ----------------------------------------------------
    // CRUD 
    // ----------------------------------------------------
    
    $('.delete-btn').click(function () {
        return confirm("Are you sure you want to delete this record?");
    });
    
    $('#modifyModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget); // Button that triggered the modal
        let modal = $(this);
    
        let columnNames = ['habitation_id', 'type_id', 'chambres', 'loyer_par_jour', 'quartier', 'description'];
    
        // Set the value of the inputs
        columnNames.forEach(column => {
            let value = button.data(column); 
            modal.find(`[name="${column}"]`).val(value); 
        });
    
        // Update the form action with habitation_id
        modal.find('form').attr('action', `${baseUrl}/update/house`);
    });

    // Ensure the correct type is selected in the dropdown
    $('#modifyModal').on('shown.bs.modal', function () {
        let typeId = $(this).find('[name="type_id"]').val();
        $(this).find(`[name="type_id"] option[value="${typeId}"]`).prop('selected', true);
    });

    // Log form data on submit
    $('#modifyForm').on('submit', function (event) {
        event.preventDefault();
        let formData = $(this).serializeArray();
        console.log("Form data being submitted:", formData);
        $.post($(this).attr('action'), formData, function (response) {
            console.log("Response from server:", response);
            window.location.reload();
        }).fail(function (xhr, status, error) {
            console.error("Error submitting form:", error);
        });
    });
    
});



/*
With vanilla javascript (raw js), event deleagation should look like this:

giftList.addEventListener('click', function(event) {
    // Check if the clicked element has the 'btn-primary' class
    if (event.target && event.target.classList.contains('btn-primary')) {
        // Handle the click event
        console.log(`Gift clicked: ${event.target.textContent}`);
    }
});

// Function to add a new gift dynamically
document.getElementById('add-gift').addEventListener('click', function() {
    const newGift = document.createElement('div');
    newGift.classList.add('gift');
    newGift.innerHTML = `<button class="btn-primary">Gift ${giftList.children.length + 1}</button>`;
    giftList.appendChild(newGift);  // Append new gift to the list
});
*/
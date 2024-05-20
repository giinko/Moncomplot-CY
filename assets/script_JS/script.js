
function openSubscriptionModal() {
    var modal = document.getElementById('subscriptionModal');
    modal.style.display = 'block';
}

function closeSubscriptionModal() {
    var modal = document.getElementById('subscriptionModal');
    modal.style.display = 'none';
}

function redirectToRegistration() {
    window.location.href = 'inscription.html'; // Rediriger vers la page d'inscription
}

// Sélection de toutes les cartes
const cards = document.querySelectorAll('.conspiration-card');

// Ajout d'un gestionnaire d'événements click à chaque carte
cards.forEach(card => {
    card.addEventListener('click', function () {
        // Vérifier si la carte est déjà sélectionnée ou non
        if (this.classList.contains('selected')) {
            this.classList.remove('selected'); // Si elle est sélectionnée, la désélectionner
        } else {
            this.classList.add('selected'); // Si elle n'est pas sélectionnée, la sélectionner
        }
    });
});

// MODAL PHOTO DE PROFIL

function openPPModal() {
    var modal = document.getElementById('PPModal');
    modal.style.display = 'block';
}

function closePPModal() {
    var modal = document.getElementById('PPModal');
    modal.style.display = 'none';
}


let selectedFile = null;

document.getElementById('importImage').addEventListener('click', function () {
    document.getElementById('img_up_profile').click();
});

document.getElementById('importImage').addEventListener('dragover', function (event) {
    event.preventDefault();
    event.stopPropagation();
    this.classList.add('dragover');
});

document.getElementById('importImage').addEventListener('dragleave', function (event) {
    event.preventDefault();
    event.stopPropagation();
    this.classList.remove('dragover');
});

document.getElementById('importImage').addEventListener('drop', function (event) {
    event.preventDefault();
    event.stopPropagation();
    this.classList.remove('dragover');
    selectedFile = event.dataTransfer.files[0];
});

document.getElementById('submitBtn').addEventListener('click', function () {
    if (selectedFile) {
        displayImage(selectedFile);
    }
});

function handleFileSelect(event) {
    selectedFile = event.target.files[0];
}

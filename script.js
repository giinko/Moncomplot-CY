const communautes = [
    {
        titre: "Platistes",
        description: "Communautée des platistes",
        image: "chemin/vers/image1.jpg"
    },
    {
        titre: "illuminatis",
        description: "communautés des illuminatis",
        image: "chemin/vers/image2.jpg"
    },
    {
        titre: "famille Rodchild",
        description: "Askip ils contrôlent le monde ? LOL",
        image: "chemin/vers/image2.jpg"
    },
];

document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.catalogue');

    articles.forEach(article => {
        const box = document.createElement('div');
        box.className = 'box';

        const image = document.createElement('img');
        image.src = article.image;
        image.alt = 'Image de ' + article.titre;

        const title = document.createElement('h3');
        title.textContent = article.titre;

        const description = document.createElement('p');
        description.textContent = article.description;

        box.appendChild(image);
        box.appendChild(title);
        box.appendChild(description);

        container.appendChild(box);
    });
});

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

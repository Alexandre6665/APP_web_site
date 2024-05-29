document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('faq-form');
    const faqList = document.getElementById('faq-list');

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const id = document.getElementById('faq-id').value;
        const question = document.getElementById('question').value;
        const answer = document.getElementById('rep').value; // Changer 'answer' à 'rep'

        const formData = new FormData();
        formData.append('question', question);
        formData.append('rep', answer); // Changer 'answer' à 'rep'

        let url = 'gestion_faq.php?action=créer'; // Changer 'create' à 'créer'
        if (id) {
            formData.append('id_faq', id); // Changer 'id' à 'id_faq'
            url = 'gestion_faq.php?action=mettre à jour'; // Changer 'update' à 'mettre à jour'
        }

        fetch(url, {
            method: 'POST',
            body: formData
        }).then(response => response.text())
            .then(data => {
                alert(data);
                form.reset();
                document.getElementById('faq-id').value = '';
                loadFAQs();
            });
    });

    function loadFAQs() {
        fetch('gestion_faq.php?action=lire') // Changer 'read' à 'lire'
            .then(response => response.json())
            .then(data => {
                faqList.innerHTML = '';
                data.forEach(faq => {
                    const faqItem = document.createElement('div');
                    faqItem.className = 'faq-item';
                    faqItem.innerHTML = `
                        <h3>${faq.question}</h3>
                        <p>${faq.rep}</p> // Changer 'answer' à 'rep'
                        <button onclick="editFAQ(${faq.id_faq}, '${faq.question}', '${faq.rep}')">Edit</button> // Changer 'id' à 'id_faq', 'answer' à 'rep'
                        <button onclick="deleteFAQ(${faq.id_faq})">Delete</button> // Changer 'id' à 'id_faq'
                    `;
                    faqList.appendChild(faqItem);
                });
            });
    }

    loadFAQs();

    window.editFAQ = (id, question, answer) => {
        document.getElementById('faq-id').value = id;
        document.getElementById('question').value = question;
        document.getElementById('rep').value = answer; // Changer 'answer' à 'rep'
    }

    window.deleteFAQ = (id) => {
        const formData = new FormData();
        formData.append('id_faq', id); // Changer 'id' à 'id_faq'

        fetch('gestion_faq.php?action=supprimer', { // Changer 'delete' à 'supprimer'
            method: 'POST',
            body: formData
        }).then(response => response.text())
            .then(data => {
                alert(data);
                loadFAQs();
            });
    }
});

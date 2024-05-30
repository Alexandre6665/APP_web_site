document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('faq-form');
    const faqList = document.getElementById('faq-list');

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const id = document.getElementById('faq-id').value;
        const question = document.getElementById('question').value;
        const answer = document.getElementById('rep').value;

        const formData = new FormData();
        formData.append('question', question);
        formData.append('rep', answer); // 

        let url = 'gestion_faq.php?action=créer';
        if (id) {
            formData.append('id_faq', id);
            url = 'gestion_faq.php?action=mettre à jour';
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
        fetch('gestion_faq.php?action=lire')
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
        document.getElementById('rep').value = answer;
    }

    window.deleteFAQ = (id) => {
        const formData = new FormData();
        formData.append('id_faq', id);

        fetch('gestion_faq.php?action=supprimer', {
            method: 'POST',
            body: formData
        }).then(response => response.text())
            .then(data => {
                alert(data);
                loadFAQs();
            });
    }
});

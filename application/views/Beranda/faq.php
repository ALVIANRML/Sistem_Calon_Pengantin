<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link href="<?= base_url('assets/') ?>css/faq.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="faq-container">
        <h1>FAQ</h1>
        <div class="faq-item">
            <div class="faq-question">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                <span class="plus">+</span>
            </div>
            <div class="faq-answer">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book...
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                <span class="plus">+</span>
            </div>
            <div class="faq-answer">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book...
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                <span class="plus">+</span>
            </div>
            <div class="faq-answer">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book...
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                <span class="plus">+</span>
            </div>
            <div class="faq-answer">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book...
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                <span class="plus">+</span>
            </div>
            <div class="faq-answer">
                Ideally, both partners should undergo a pre-wedding medical check-up. It ensures that both individuals are aware of their health status and can take necessary steps to address any concerns.
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                <span class="plus">+</span>
            </div>
            <div class="faq-answer">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book...
            </div>
        </div>
    </div>
<script>
	document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        item.querySelector('.faq-question').addEventListener('click', () => {
            item.classList.toggle('open');
        });
    });
});

</script>
</body>
</html>

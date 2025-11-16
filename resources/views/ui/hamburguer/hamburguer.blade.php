<script>
    const taskSidebar = document.getElementById('taskSidebar');
    const hamburguer = document.querySelector('.hamburger');

    hamburguer.addEventListener('click', () => {
        taskSidebar.classList.toggle('hidden');
    });
</script>

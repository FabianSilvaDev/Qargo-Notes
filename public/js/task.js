/* ----------------------------------------------------
 *Task Search → Filtrar tareas por texto
 * ----------------------------------------------------
 */
document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.querySelector("#taskSearch");
    const tasks = document.querySelectorAll(".task-card"); 

    searchInput?.addEventListener("input", e => {
        const query = e.target.value.toLowerCase();

        tasks.forEach(article => {
            const taskDivs = article.querySelectorAll(".task-div");
            let hasVisible = false; 

            taskDivs.forEach(task => {
                const text = task.innerText.toLowerCase();
                const isVisible = text.includes(query);
                task.classList.toggle("hidden", !isVisible);

                if (isVisible) hasVisible = true;
            });

            // Ocultar el article si no hay tareas visibles
            article.classList.toggle("hidden", !hasVisible);
        });
    });
});


/* ----------------------------------------------------
 * Open/Close Sidebar for each task
 * ----------------------------------------------------
 */
document.querySelectorAll(".button-edit").forEach(button => {
    button.addEventListener("click", e => {
        e.stopPropagation();

        const taskCard = button.closest(".task-div");
        const sidebar = taskCard.querySelector(".editTask-sidebar");
        if (!sidebar) return;

        sidebar.classList.toggle("opacity-0");
        sidebar.classList.toggle("scale-95");
        sidebar.classList.toggle("pointer-events-none");
        sidebar.classList.toggle("opacity-100");
        sidebar.classList.toggle("scale-100");
    });
});


/* ----------------------------------------------------
 * Expand/Collapse description when clicking the card
 * ----------------------------------------------------
 */
document.querySelectorAll(".task-div").forEach(card => {
    const desc = card.querySelector(".description");
    if (!desc) return;

    card.addEventListener("click", e => {
        if (
            e.target.closest("button") ||
            e.target.closest("form") ||
            e.target.closest(".button-edit") ||
            e.target.closest(".editTask-sidebar")
        ) return;

        desc.classList.toggle("line-clamp-2"); // muestra/oculta el recorte
        desc.classList.toggle("select-none");  // bloquea selección cuando está colapsada
    });
});


/* ----------------------------------------------------
 * Edit Description → show textarea
 * ----------------------------------------------------
 */
document.querySelectorAll(".edit-description").forEach(item => {
    item.addEventListener("click", e => {
        e.stopPropagation();

        const card = item.closest(".task-div");
        const p = card.querySelector(".description");
        const textarea = card.querySelector(".description-input");
        const confirmBtn = card.querySelector(".confirm-edit");
        const form = card.querySelector(".update-form");
        const sidebar = card.querySelector(".editTask-sidebar");

        if (!p || !textarea || !confirmBtn || !form) return;

        textarea.value = p.textContent.trim();

        p.classList.add("hidden");
        textarea.classList.remove("hidden");
        confirmBtn.classList.remove("hidden");
        form.classList.remove("hidden");

        textarea.focus();

        if (sidebar) {
            sidebar.classList.add("opacity-0", "scale-95", "pointer-events-none");
            sidebar.classList.remove("opacity-100", "scale-100");
        }
    });
});


/* ----------------------------------------------------
 * Confirm → submit form
 * ----------------------------------------------------
 */
document.querySelectorAll(".confirm-edit").forEach(btn => {
    btn.addEventListener("click", e => {
        e.stopPropagation();

        const form = btn.closest(".update-form");
        if (form) form.submit();
    });
});

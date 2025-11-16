<div class="bg-gray-100 z-50 w-full h-full hidden items-center justify-center fixed overflow-y-hidden" id="taskForm">
    <form action="{{ url('/') }}" method="post"
        class="flex flex-col items-center mt-4 bg-gray-100 p-6 rounded sm:shadow-md max-w-[500px] w-full relative">
        <h2 class="text-5xl font-bold mb-5">
            Add Task
        </h2>

        @csrf
        <!-- title -->
        <input type="text" name="title" placeholder="Title" class="w-full mb-2 p-2 border rounded">
        
        <!-- priority -->

        <select name="priority" class="w-full mb-2 p-2 border rounded">
            <option value="" disabled selected>Select priority</option>
            <option value="High">High</option>
            <option value="Medium">Medium</option>
            <option value="Normal">Normal</option>
        </select>

        <!-- description textarea -->
        <textarea name="description" placeholder="Description"
            class="w-full mb-4 p-2 border rounded resize-none h-32 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>

        <div class="flex gap-4">
            <input type="submit" value="Add task"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 cursor-pointer">
            <button type="button"
                class="closeFormBtn bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 cursor-pointer">
                Cancel
            </button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        const modal = $("#exampleModal");
        const openModalButtons = $(".open-modal");
        const modalTitle = modal.find(".modal-title");
        const modalBody = modal.find(".modal-body");

        modal.on("click", '[data-dismiss="modal"]', function () {
            modal.addClass("hidden");
        });

        openModalButtons.click(function () {
            modalBody.html("");
            modal.removeClass("hidden");
            modalBody.html(`<div class="relative rounded-xl overflow-auto p-8">
                            <div class="flex items-center justify-center">
                                <button type="button" class="inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-white bg-indigo-500 hover:bg-indigo-400 transition ease-in-out duration-150 cursor-not-allowed" disabled="">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                        Fetching data...
                                </button>
                            </div>
                        </div>`);

            const recipient = $(this).data("recipient");
            const url = $(this).data("url");
            modalTitle.text(recipient);

            $.ajax({
                url: url,
                method: "GET",
                beforeSend: function (xhr) {
                    xhr.setRequestHeader(
                        "X-CSRF-Token",
                        $('meta[name="csrf-token"]').attr("content")
                    );
                },
                success: function (data) {
                    if (data) {
                        modalBody.html(data);
                    } else {
                        modalBody.html("No data found");
                    }
                },
                error: function (error) {
                    modalBody.html("Error fetching data: " + error.statusText);
                },
            });
        });
        // ==========================================================
        const openDeleteModalButtons = $(".open-delete-modal");

        openDeleteModalButtons.click(function () {
            modalBody.html("");
            modal.removeClass("hidden");
            modalBody.html(`<div class="relative rounded-xl overflow-auto p-8">
                            <div class="flex items-center justify-center">
                                <button type="button" class="inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-white bg-indigo-500 hover:bg-indigo-400 transition ease-in-out duration-150 cursor-not-allowed" disabled="">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                        Fetching data...
                                </button>
                            </div>
                        </div>`);

            const recipient = $(this).data("recipient");
            const url = $(this).data("url");
            modalTitle.text(recipient);

            const modalBodyData = `
        <div class="m-20">
            <form action="${url}" method="POST">
            @csrf
            @method('DELETE')
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-5">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Delete !</h3>

                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Are you sure you want to delete this data? Data will be permanently removed. This action cannot be undone.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        `;

            modalBody.html(modalBodyData);
        });
    });

</script>

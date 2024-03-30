    <!-- ============== modal ================ -->
    <div class="fixed inset-0 z-50 hidden overflow-y-auto bg-gray-900 bg-opacity-50 modal" id="exampleModal">
        <div class="relative mx-auto w-full max-w-max p-5 rounded-lg bg-white shadow-md">
            <div class="flex justify-between items-center mb-3">
                <h1 class="text-xl font-mono font-bold text-gray-700 modal-title"></h1>
                <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="py-1 px-4 mb-4 bg-red-300 rounded-lg text-black text-3xl">&times;</span>
                </button>
            </div>
            <div class="modal-body h-full overflow-y-auto bg-[#abc]"></div>
            <div class="flex justify-between items-center">
            </div>
        </div>
    </div>
    <!-- ============== modal ================ -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


    @include('modal_script')
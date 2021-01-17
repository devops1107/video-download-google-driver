<?php
get_header();
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<div class="starter-template">
    <div class="card mt-3">
        <div class="card-header">
            <h3>Add Link</h3>
        </div>
        <div class="card-body">
            <form action="/action" method="post" id="add_link" class="form-group">
                <input type="hidden" name="action" value="add_link">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Google Drive</span>
                    </div>
                    <input type="text" class="form-control" name="url" placeholder="Paste your Google Drive URL">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Subtitle</span>
                    </div>
                    <input type="text" class="form-control" name="subtitle" placeholder="Indonesia=https://domain.com/sub_id.srt|English=https://domain.com/sub_en.srt">
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-success" type="submit">Generate Now
                        <svg class="bi bi-arrow-repeat" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.854 7.146a.5.5 0 00-.708 0l-2 2a.5.5 0 10.708.708L2.5 8.207l1.646 1.647a.5.5 0 00.708-.708l-2-2zm13-1a.5.5 0 00-.708 0L13.5 7.793l-1.646-1.647a.5.5 0 00-.708.708l2 2a.5.5 0 00.708 0l2-2a.5.5 0 000-.708z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M8 3a4.995 4.995 0 00-4.192 2.273.5.5 0 01-.837-.546A6 6 0 0114 8a.5.5 0 01-1.001 0 5 5 0 00-5-5zM2.5 7.5A.5.5 0 013 8a5 5 0 009.192 2.727.5.5 0 11.837.546A6 6 0 012 8a.5.5 0 01.501-.5z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center">
        <div class="alert alert-danger hidden" role="alert">
            Failed! Maybe your file has been added before.
        </div>
        <div class="alert alert-success hidden" role="alert">
            Success Add New Video!
        </div>
        <div class="spinner-border hidden" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="row url-show hidden">
        <div class="col-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Streaming</span>
                </div>
                <textarea class="form-control" id="video" aria-label="With textarea"></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Download</span>
                </div>
                <textarea class="form-control" id="download" aria-label="With textarea"></textarea>
            </div>
        </div>
    </div>
    <script>
        $("#add_link").submit(function(e){
            e.preventDefault();
            var form = $(this);
            $(".spinner-border").removeClass('hidden');
            $(".alert-danger").addClass('hidden');
            $(".alert-success").addClass('hidden');
            $(".url-show").addClass('hidden');
            $.ajax({
                type: "POST",
                url: "/action",
                data: form.serialize(),
                success: function (data) {
                    $(".spinner-border").addClass('hidden');
                    if(data == false){
                        $(".alert-danger").removeClass('hidden');
                    } else {
                        $(".alert-success").removeClass('hidden');
                        $(".url-show").removeClass('hidden');
                        $("#video").val(location.protocol + '//' + location.hostname + '/v/' + data);
                        $("#download").val(location.protocol + '//' + location.hostname + '/d/' + data);
                    }
                }
            });
        })
    </script>
</div>


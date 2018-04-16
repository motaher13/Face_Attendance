{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>--}}
{{--<script type="text/javas<div class="form-group">
                <label for="description" class="control-label col-sm-2">Short Description</label>
                <div class="col-sm-8">
                    <textarea class="form-control" placeholder="description" name="short_description" id="short_description"></textarea>
                </div>
            </div>cript" src="{!! asset('assets/global/plugins/blueimp/vendor/jquery.ui.widget.js') !!}"></script>--}}
{{--<script type="text/javascript" src="{!! asset('assets/global/plugins/blueimp/jquery.iframe-transport.js') !!}"></script>--}}
{{--<script type="text/javascript" src="{!! asset('assets/global/plugins/blueimp/jquery.fileupload.js') !!}"></script>--}}
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>


<script>
    CKEDITOR.replace( 'short_description',{
        toolbar : 'Basic',
        uiColor : '#9AB8F3'
    } );

    CKEDITOR.replace( 'long_description',{
        toolbar : 'Basic',
        uiColor : '#9AB8F3'
    } );

    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        evt.currentTarget.className += " active";
        document.getElementById(cityName).style.display = "block";

    }
    function appendText() {
        var element = '<div class="row" style="margin-bottom: 5px"><div class="col-sm-8"><input class="form-control" placeholder="Enter url" name="url[]" type="text" required></div><div class="col-sm-3"><select name="source[]"  class=" form-control" required><option selected disabled hidden>Source</option><option value="youtube" >Youtube</option><option value="other" >Other</option></select></div></div>';

        $("#urlSubmit").before(element);     // Append new elements
    }

</script>





<script>
    $(function(){
        $('#urlForm').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: $('#urlForm').attr('action'),
                type: "POST",
                data: $('#urlForm').serialize(),
                dataType : 'json',
                success: function(data){
                    $('#modalalert').text("success");
                },
                error: function(data) {
                    //console.log(data);

                }
            });
        });
    });
</script>





<script>
    $(document).ready(function(){

//            $(".js-example-basic-single").select2();

        $("#type").on('change', function() {

            if($(this).val() == "basic"){
                $(".hid").addClass("hidden");
                $(".hid").val(null);

            }else if($(this).val() == "scheduled"){
                $(".hid").removeClass("hidden");

            }else {
                $(".hid").addClass("hidden");
            }


        });

        // $("#material").on('change', function() {
        //
        //     if($(this).val() == 1){
        //         $("#url").removeClass("hidden");
        //         $("#file").addClass("hidden");
        //         $("#file").val(null);
        //
        //     }else if($(this).val() == 2){
        //         $("#file").removeClass("hidden");
        //         $("#url").addClass("hidden");
        //         $("#url").val(null);
        //     }
        //
        // });
        //
        // $('#fileupload').fileupload({
        //     dataType: 'json',
        //     add: function (e, data) {
        //         $('#loading').text('Uploading...');
        //         data.submit();
        //     },
        //     done: function (e, data) {
        //         $.each(data.result.files, function (index, file) {
        //             $('<p/>').html(file.name + ' (' + file.size + ' KB)').appendTo($('#files_list'));
        //             if ($('#file_ids').val() != '') {
        //                 $('#file_ids').val($('#file_ids').val() + ',');
        //             }
        //             $('#file_ids').val($('#file_ids').val() + file.fileID);
        //         });
        //         $('#loading').text('');
        //     },
        //     error: function (e,data) {
        //         console.log(e);
        //     }
        // });



    });



</script>

@include('course.includes.blueim_x-template')
<script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/js/vendor/jquery.ui.widget.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-JavaScript-Templates/3.11.0/js/tmpl.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-load-image/2.17.0/load-image.all.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/javascript-canvas-to-blob/3.14.0/js/canvas-to-blob.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-gallery/2.27.1/js/jquery.blueimp-gallery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/js/jquery.iframe-transport.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/js/jquery.fileupload.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/js/jquery.fileupload-process.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/js/jquery.fileupload-image.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/js/jquery.fileupload-validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/js/jquery.fileupload-ui.min.js"></script>
<script type="text/javascript" src="{!! asset('assets/global/plugins/blueimp/new.js') !!}"></script>


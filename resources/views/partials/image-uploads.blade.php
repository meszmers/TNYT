<div>
    Upload Images
    <div style="margin-bottom: 20px; display: flex; flex-wrap: wrap; gap: 20px">
    @for($i = 1; $i <= $count; $i++)

            <div style="width: 320px; height: 180px;">
                <input
                    id="imgUpload{{ str_replace([1,2,3,4], ['One', 'Two', 'Three', 'Four'], $i) }}"
                    type="file"
                    accept="image/png, image/jpeg"
                    name="images[]" style="display:none">
                <img
                    id="imgPreview{{ str_replace([1,2,3,4], ['One', 'Two', 'Three', 'Four'], $i) }}"
                    onclick="openUpload({{ str_replace([1,2,3,4], ['One', 'Two', 'Three', 'Four'], $i) }})"
                    alt=""
                    src="{{URL::asset('/img-placeholder.svg')}}"
                    width="320" height="180"
                    style="cursor:pointer;">
                <div style="margin-top: 20px">
                    <input type="text"  name="titles[{{ $i }}]" placeholder="Title">
                </div>
            </div>
    @endfor
</div>
</div>

<script>

    $('#imgPreviewOne').click(
        function(){
            $('#imgUploadOne').trigger('click');
        });
    $('#imgPreviewTwo').click(
        function(){
            $('#imgUploadTwo').trigger('click');
        });
    $('#imgPreviewThree').click(
        function(){
            $('#imgUploadThree').trigger('click');
        });
    $('#imgPreviewFour').click(
        function(){
            $('#imgUploadFour').trigger('click');
        });

    imgUploadOne.onchange = evt => {
        const [file] = imgUploadOne.files
        if (file) {
            imgPreviewOne.src = URL.createObjectURL(file)
        }
    }
    imgUploadTwo.onchange = evt => {
        const [file] = imgUploadTwo.files
        if (file) {
            imgPreviewTwo.src = URL.createObjectURL(file)
        }
    }
    imgUploadThree.onchange = evt => {
        const [file] = imgUploadThree.files
        if (file) {
            imgPreviewThree.src = URL.createObjectURL(file)
        }
    }
    imgUploadFour.onchange = evt => {
        const [file] = imgUploadFour.files
        if (file) {
            imgPreviewFour.src = URL.createObjectURL(file)
        }
    }
</script>


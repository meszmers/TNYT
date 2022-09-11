<div>
    Upload Images
    <div style="margin-bottom: 40px; display: flex; flex-wrap: wrap; gap: 50px">
    @for($i = 1; $i <= $count; $i++)

            <div class="singleImageContainer"
                 @if($i === 1 && $count % 2 !== 0)
                     style="padding: 100% !important;"
                @endif
            >
                <input
                    id="imgUpload{{ str_replace([1,2,3,4,5,6,7,8,9,10], ['One', 'Two', 'Three', 'Four'], $i) }}"
                    type="file"
                    accept="image/png, image/jpeg"
                    name="images[]" style="display:none">
                <img
                    id="imgPreview{{ str_replace([1,2,3,4], ['One', 'Two', 'Three', 'Four'], $i) }}"
                    alt=""
                    src="{{URL::asset('/img-placeholder.svg')}}"
                    width="100%" height="100%"
                    style="cursor:pointer;">
{{--                <div style="margin-top: 20px" >--}}
{{--                    <input type="text"  name="titles[{{ $i }}]" placeholder="Title">--}}
{{--                </div>--}}
            </div>
    @endfor
</div>
</div>

<script>

    for (let i = 1; i <= {{ $count }}; i++) {

        let iterationToString = replaceNumberToString(i);
        let test = '#imgPreview' + iterationToString;
        let test2 = '#imgUpload' + iterationToString;

        $(test).click(
            function(){
                $(test2).trigger('click');
            });

        $(test2).on('change', function() {
            const [file] = $(test2).prop('files')
            if (file) {
                $(test).attr("src", URL.createObjectURL(file));
            }
        });
    }

    function replaceNumberToString(number) {
        const numbers = [1,2,3,4,5,6,7,8,9,10];
        const strings = ['One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Nine', 'Ten']

        return strings[numbers.indexOf(number)];
    }


</script>

<style>
    .singleImageContainer {
        width: 440px;
        margin: auto;
    }
</style>


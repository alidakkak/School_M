<div class="modal fade" id="delete_l{{$lecture->id}}" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('l.delete', $lecture->id) }}" method="">

            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;"
                        class="modal-title" id="exampleModalLabel">delete </h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> {{ ('Warning Lecture') }} <span class="text-danger">{{$lecture->title}}</span></p>
                    <input type="hidden" name="id" value="{{$lecture->id}}">
                    <input type="hidden" name="file_name" value="{{$lecture->file_name}}">
                </div>
                <div class="modal-footer">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ ('Close') }}</button>
                        <button type="submit"
                                class="btn btn-danger">{{ ('Submit') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('posts.delete') }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                <input type="hidden" name="id" id="id" value="">
                <input class="form-control" name="name" id="name" type="text" readonly>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">حزف</button>
              </div>
        </form>
      </div>
    </div>
  </div>

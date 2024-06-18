<!-- Modal -->
<div class="modal fade" tabindex="-1" id="verify">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Verifikasi Ijazah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="form" method="POST" action="{{ route('student.verify') }}">
                    @csrf
                    @method('PUT')
                    <input type="text" name="student_id" value="{{ $student->id }}" hidden>
                    <input type="text" name="isVerified" value="1" hidden>
                    <p> Apakah anda yakin ingin memverifikasi data ? </p>
                    <button type="submit" class="btn btn-primary btn-sm float-end">
                        Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

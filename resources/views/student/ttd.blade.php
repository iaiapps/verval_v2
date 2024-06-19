<!-- Modal -->
<div class="modal fade" tabindex="-1" id="ttd" aria-labelledby="ttdLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tanda Tangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="card p-3">
                <form id="form" method="POST" action="{{ route('signaturepad.upload') }}">
                    @csrf
                    <input type="text" hidden name="student_id" value="{{ $student->id }}">
                    <div class="wrapper">
                        <canvas id="signature-pad" class="signature-pad" class="bg-white"></canvas>
                        <textarea hidden id="signature64" name="signed"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger float-start" id="clear"><i
                            class="fa fa-eraser"></i>
                        Hapus</button>
                    <button type="submit" class="btn btn-primary float-end">
                        Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('css')
    <style>
        .signature-pad {
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            height: 260px;
            background-color: white
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
    <script>
        var canvas = document.getElementById('signature-pad');

        const myModalEl = document.getElementById('ttd')
        myModalEl.addEventListener('show.bs.modal', event => {
            setTimeout(
                function() {
                    window.onresize = resizeCanvas;
                    resizeCanvas();
                }, 250);
        });

        // memperbaiki pindah tampilan dan reset
        function resizeCanvas() {
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
            signaturePad.clear();
        }

        var signaturePad = new SignaturePad(canvas, {
            minWidth: 1,
            maxWidth: 2,
            backgroundColor: "rgb(255, 255, 255)",
        });

        $('#form').submit(function() {
            $('#signature64').val(signaturePad.toDataURL('image/png'))
        })

        document.getElementById('clear').addEventListener('click', function() {
            signaturePad.clear();
        });
    </script>
@endpush

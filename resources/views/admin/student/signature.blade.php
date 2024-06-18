@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Signature Pad</h4>
                <hr>
                <form id="form" method="POST" action="{{ route('signaturepad.upload') }}">
                    @csrf
                    <div class="wrapper">
                        <canvas id="signature-pad" class="signature-pad"></canvas>

                        <textarea hidden id="signature64" name="signed"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm float-start" id="clear"><i
                            class="fa fa-eraser"></i>
                        Clear</button>
                    <button type="submit" class="btn btn-primary btn-sm float-end">
                        Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
    <script>
        var canvas = document.getElementById('signature-pad');

        // memperbaiki pindah tampilan
        function resizeCanvas() {
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
            signaturePad.clear();
        }

        window.onresize = resizeCanvas;
        resizeCanvas();

        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: "rgb(255, 255, 255)",
            minWidth: 1,
            maxWidth: 2,
        })
        signaturePad.backgroundColor = "rgb(255, 255, 255)";
        signaturePad.minWidth = 1;
        signaturePad.maxWidth = 2;



        $('#form').submit(function() {
            $('#signature64').val(signaturePad.toDataURL('image/png'))
        })

        document.getElementById('clear').addEventListener('click', function() {
            signaturePad.clear();
        });
    </script>
@endpush

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

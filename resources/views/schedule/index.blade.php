@extends('layouts.adminlte')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Schedule an email</div>
                </div>
                <div class="card-body">
                <form action="{{ route('schedule-email') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">From Name</label>
                        <input type="text" class="form-control" name="from_name" placeholder="John Doe" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">From Email</label>
                        <input type="text" class="form-control" name="from_email" placeholder="from@example.com" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">To Name</label>
                        <input type="text" class="form-control" name="to_name" placeholder="Jane Doe" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">To Email</label>
                        <input type="text" class="form-control" name="to_email" placeholder="to@example.com" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Message</label>
                        <textarea name="message" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Send Now/Later</label>
                        <div class="radio">
                            <input type="radio" class="send-option" name="send_option" value="now" checked>
                            Send Now
                        </div>

                        <div class="radio">
                            <input type="radio" class="send-option" name="send_option" value="later">
                            Send Later
                        </div>
                    </div>

                    <div class="form-group picker d-none">
                        <label class="form-label">Date/Time</label>
                        <input type="text" name="date_time" class="form-control" id="datetimepicker">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
@endsection

@push('scripts')
<script>
$(function() {
    var dateToday = new Date()
    $('#datetimepicker').datetimepicker({
        minDate: dateToday
    })

    $('.send-option').change(function() {
        let val = $(this).val()

        if (val === 'later')
            $('.picker').removeClass('d-none')
        else
            $('.picker').addClass('d-none')
    })
})
</script>
@endpush
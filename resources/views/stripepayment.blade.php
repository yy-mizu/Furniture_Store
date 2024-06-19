<form id="stripe-payment-form" method="POST" action="{{ route('session') }}">
    @csrf
    <!-- Include any necessary hidden fields for the payment session -->
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('stripe-payment-form').submit();
    });
</script>

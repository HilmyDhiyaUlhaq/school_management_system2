<!DOCTYPE html>
<html>
<head>
	<title>Pembayaran Stripe</title>
</head>
<body>
<script src="https://js.stripe.com/v3"></script>
<script type="text/javascript">
	var session_id = '{{ $session_id }}';
	var stripe = Stripe('{{ $setPublicKey }}');

    stripe.redirectToCheckout({
	      sessionId: session_id
	   }).then(function (result) {
	});
</script>
</body>
</html>

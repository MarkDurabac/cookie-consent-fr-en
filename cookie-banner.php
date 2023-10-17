<?php if (!isset($_COOKIE['cookie_consent']) || ($_COOKIE['cookie_consent'] !== 'accepted' && $_COOKIE['cookie_consent'] !== 'dismissed' && $_COOKIE['cookie_consent'] !== 'refused')): ?>
<style>
	#cookie-banner {
		position: fixed;
		bottom: 0;
		width: 100%;
		background-color: #f5f5f5;
		z-index: 1000;
		border-top: 1px solid #e0e0e0;
		padding: 10px 0;
		text-align: center;
		transform: translateY(100%);
		opacity: 0;
		transition: transform 0.5s ease-out, opacity 0.5s ease-out;
	}

	#cookie-banner.show-banner {
		transform: translateY(0);
		opacity: 1;
	}

    #close-cookie-banner {
        position: absolute; right: 10px; top: 5px; 
        cursor: pointer; font-size: 20px; font-weight: bold;
    }

    #accept-cookies, #refuse-cookies {
        font-size: 16px;
        padding: 10px 15px;
        margin-right: 10px;
    }
</style>

<div id="cookie-banner">
    <span id="close-cookie-banner">X</span>
    <b><big id="cookie-title">Ce site utilise des cookies</big></b>
    <p id="cookie-description">
        Nous utilisons des cookies pour améliorer l'expérience des utilisateurs.<br>
        Pour en savoir plus sur notre politique en matière de cookies, consultez <a href="/durabac/conf">notre politique de confidentialité.</a><br>
	Veuillez indiquer votre préférence concernant l'utilisation des cookies.
    </p>
    <button id="accept-cookies">J'accepte</button>
    <button id="refuse-cookies">Refuser</button>
</div>

<script>
	function showBanner() {
		var banner = document.getElementById('cookie-banner');
		setTimeout(function() {
			banner.classList.add('show-banner');
		}, 50);
	}

	function hideBanner() {
		var banner = document.getElementById('cookie-banner');
		banner.classList.remove('show-banner');
		setTimeout(function() {
			banner.style.display = 'none';
		}, 500);
	}
	// Inclure les scripts Google Analytics ici
	function loadGoogleAnalytics() {
		var script = document.createElement('script');
		script.async = true;
		script.src = "https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXX";
		document.head.appendChild(script);

		script.onload = function() {
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'G-XXXXXXXX', {
                'client_storage': 'none',
                'anonymize_ip': true
            });
		}
	}

    function setCookie(name, value) {
        var date = new Date();
        date.setFullYear(date.getFullYear() + 1);
        var secureAttribute = window.location.protocol === 'https:' ? "; secure" : "";
        document.cookie = name + "=" + value + "; expires=" + date.toUTCString() + "; path=/; samesite=strict" + secureAttribute;
    }
    
	var pathSegments = window.location.pathname.split('/');
	var isEnglish = pathSegments[1] === 'en';

	var messageTitle = isEnglish ? 'This website uses cookies' : 'Ce site utilise des cookies';
	var messageDescription = isEnglish ? 
		'We use cookies to enhance user experience. <br> To learn more about our cookie policy, visit <a href="/durabac/conf">our privacy policy.</a> <br> Please indicate your preference regarding the use of cookies.' :
		'Nous utilisons des cookies pour améliorer l\'expérience des utilisateurs.<br> Pour en savoir plus sur notre politique en matière de cookies, consultez <a href="/durabac/conf">notre politique de confidentialité.</a> <br> Veuillez indiquer votre préférence concernant l\'utilisation des cookies.';

	var acceptButtonText = isEnglish ? 'I accept' : 'J\'accepte';
	var refuseButtonText = isEnglish ? 'Refuse' : 'Refuser';

	document.getElementById('cookie-title').textContent = messageTitle;
	document.getElementById('accept-cookies').textContent = acceptButtonText;
	document.getElementById('refuse-cookies').textContent = refuseButtonText;

	var descContainer = document.getElementById('cookie-description');
	descContainer.innerHTML = messageDescription;
    
	document.getElementById('accept-cookies').addEventListener('click', function() {
		hideBanner();
		setCookie("cookie_consent", "accepted");
		loadGoogleAnalytics();
	});
		
	document.getElementById('refuse-cookies').addEventListener('click', function() {
		hideBanner();
		setCookie("cookie_consent", "refused");
	});

	document.getElementById('close-cookie-banner').addEventListener('click', function() {
		hideBanner(); 
		setCookie("cookie_consent", "dismissed"); 
	});

    showBanner();
</script>
<?php else: ?>
    <?php if ($_COOKIE['cookie_consent'] === 'accepted'): ?>
        <!-- Inclure les scripts Google Analytics ici -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXX"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-XXXXXXXX');
        </script>
    <?php endif; ?>
<?php endif; ?>

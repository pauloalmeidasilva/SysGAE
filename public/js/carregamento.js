window.addEventListener('load', () => {
	const loader = document.getElementById('loader');
	setTimeout(() => {
		loader.classList.add('fadeOut');
	}, 3000);
});
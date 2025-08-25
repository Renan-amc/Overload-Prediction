<script>
    function hideLoading() {
        const loading = document.getElementById('loading-screen');
        if (loading) {
            loading.classList.add('hidden');
            
            setTimeout(() => {
                loading.remove();
            }, 300);
        }
    }

    // Múltiplos eventos para garantir
    if (document.readyState === 'complete') {
        hideLoading();
    } else {
        window.addEventListener('load', hideLoading);
        document.addEventListener('DOMContentLoaded', hideLoading);
    }

    setTimeout(hideLoading, 4000);
</script>
<div x-data="{ open: false }" x-show="open" x-on:notify.window="
    let bgColor = '#6596ff'; // default (info)

    switch ($event.detail.style) {
      case 'success':
        bgColor = '#22c55e'; // green
        break;
      case 'error':
        bgColor = '#ef4444'; // red
        break;
      case 'warning':
        bgColor = '#f59e0b'; // orange
        break;
      case 'info':
        bgColor = '#3b82f6'; // blue
        break;
      default:
        bgColor = '#64748b'; // gray
    }

    Toastify({
    text: $event.detail.message,
    duration: 3000,
    newWindow: true,
    close: true,
    gravity: 'top', 
    position: 'right', 
    stopOnFocus: true,
    style: {
      background: bgColor,
      borderRaduis:'5px',
    },
  }).showToast();">

</div>
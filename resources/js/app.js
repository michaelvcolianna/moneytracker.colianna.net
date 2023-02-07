import './bootstrap'
import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()

/**
 * Key listeners.
 */
document.onkeyup = (event) => {
  if(typeof event.key === 'string') {
    let key = event.key.toLowerCase()

    event ??= window.event

    if(key === 'escape' || key === 'esc') {
      console.log('we working?')
      Livewire.emit('escapeKeyPressed')
    }
  }
}

import './bootstrap'

/**
 * Key listeners.
 */
document.onkeyup = (event) => {
  if(typeof event.key === 'string') {
    let adder = document.querySelector('div[class^="add-"]')
    let add = document.querySelector('a[href="#add"]')
    let key = event.key.toLowerCase()

    // Escape key to collapse expandables
    if(key === 'escape' || key === 'esc') {
      Livewire.dispatch('escapeKeyPressed')
    }

    // // A key to expand add new item
    if(
      key === 'a'
      &&
      add
      &&
      !adder.classList.contains('expanded')
      &&
      document.activeElement.tagName.toLowerCase() !== 'input'
    ) {
      add.dispatchEvent(new Event('click'))
    }
  }
}

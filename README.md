
```
 php artisan serve --host=livewire-basics.test --port=8080
```

```
 C:\Windows\System32\drivers\etc\hosts
```

```
@livewireStyles

@livewireScripts
```


```
wire:model='name'
wire:model.debounce.500ms='name'
wire:model.lazy = 'name'
wire:model.defer = 'name'
```

```
wire:click="$set('name',null)"
```

```
<form wire:submit.prevent='submitForm' ......>  </form >
```

```
 <button type="submit" wire:loading wire:target="submitForm" class="disabled:opacity-60.....
```


```
<button type="submit"  class="px-6 py-3 mt-3 font-bold text-white transition duration-300 ease-in-out bg-indigo-600 rounded-lg disabled:opacity-60 md:w-32 hover:bg-blue-dark hover:bg-indigo-500">
                        <svg wire:loading class="inline w-5 h-5 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                          </svg> Submit
                    </button>
```

```
class Counter extends Component
{

    public $count;

    public function mount()
    {
        $this->count = 0;
    }

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;

    }

    public function render()
    {
        return view('livewire.counter');
    }
}
```

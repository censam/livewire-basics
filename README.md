 php artisan serve --host=livewire-basics.test --port=8080

 C:\Windows\System32\drivers\etc\hosts



```
wire:model='name'
wire:model.debounce.500ms='name'
wire:model.lazy = 'name'
wire:model.defer = 'name'
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

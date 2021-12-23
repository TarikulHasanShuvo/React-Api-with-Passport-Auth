<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>


<div class="container mt-5">
    <h1 x-data="{ message: 'I Love Alpine' }" x-text="message"></h1>

    <div x-data="{ count: 0 }">
        <h1 x-text="count"></h1>
        <button @click="count++" class="btn btn-primary">Increment</button>
    </div>

    <div x-data="{ open: false }" class="my-4">
        <button @click="open = ! open"  :class=" open ?  'btn-warning' : 'btn-success' " class="btn ">Toggle</button>

        <div x-show="open" @click.outside="open = false">Contents...</div>
    </div>



    <div
        x-data="{
        search: '',

        items: ['foo', 'bar', 'baz'],

        get filteredItems() {
            return this.items.filter(
                i => i.startsWith(this.search)
            )
        }
    }"
    >
        <input x-model="search" placeholder="Search...">

        <ul>
            <template x-for="item in filteredItems" :key="item">
                <li x-text="item"></li>
            </template>
        </ul>
    </div>

    <div x-data="{ open: false }" x-init="$watch('open', value => console.log(value))">
        <button @click="open = ! open">Toggle Open</button>
    </div>

</div>


<script>


</script>


<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

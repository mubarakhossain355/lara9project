@component('mail::message')
    # This new Category Create by {{ $category->name }}

    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur nihil dolore temporibus sed, saepe voluptatem quos
    libero eveniet laudantium ex illum? Iste fugit in culpa praesentium doloremque, dolorem doloribus voluptatum!
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error hic corporis ex! Ducimus, temporibus, nostrum
    praesentium inventore similique beatae explicabo eius corrupti, veritatis sunt magni assumenda itaque quibusdam delectus
    eveniet.
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime nobis id saepe necessitatibus voluptatem doloribus. Ea
    voluptatibus, delectus vero provident assumenda fugiat architecto temporibus suscipit ab nostrum blanditiis consequatur
    accusamus!
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore dolores, iste ut necessitatibus obcaecati consectetur
    repudiandae facere nam voluptatum eos minus accusantium blanditiis doloribus, laboriosam illo esse corporis harum. Vel.

    @component('mail::button', ['url' => route('category.show', $category->id), 'color' => 'success'])
        Add new Category
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent

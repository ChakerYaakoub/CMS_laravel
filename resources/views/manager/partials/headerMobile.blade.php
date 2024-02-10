<header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
    <div class="flex items-center justify-between">
        <a href="index.html" class=" text-3xl font-semibold uppercase hover:text-gray-300">{{$title}}</a> 
        <button  @click="isOpen = !isOpen" class=" text-3xl focus:outline-none">
            <i x-show="!isOpen" class="fas fa-bars"></i>
            <i x-show="isOpen" class="fas fa-times"></i>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4" >
        <a href="/sites/manager/newBlog" class="flex items-center {{ request()->is('sites/manager/newBlog') ? 'active-nav-link' : '' }} py-2 pl-4 nav-item">
            <i class="fas fa-plus mr-3"></i>
            New Blog
        </a>
        <a href="/sites/manager/dashboard" class="flex items-center {{ request()->is('sites/manager/dashboard') ? 'active-nav-link' : '' }}  py-2 pl-4 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="/sites/manager/allBlogs" class="flex items-center  {{ request()->is('sites/manager/allBlogs') ? 'active-nav-link' : '' }} opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-sticky-note mr-3"></i>
            My Blogs        </a>
        <a href="/sites/manager/Blank2" class="flex items-center {{ request()->is('sites/manager/Blank2') ? 'active-nav-link' : '' }}  opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-sticky-note mr-3"></i>
            Blank Page2
        </a>
    

    </nav>

</header>
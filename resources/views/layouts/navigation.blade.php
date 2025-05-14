

<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">DeckHub</span>
  </a>
  <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      @auth
        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFwAAABcCAMAAADUMSJqAAAAYFBMVEVVYIDn7O3///9TXn/q7/BPWnzQ1dxncY1IVHhMWHuiqLiLkqf4+PrLztf09ffX3OFye5Xk5emssL6Umq1ha4m5vcmEjKF+hp7e4OdaZYSaobOvtsLq6+9tdpG7wst4gJljs+29AAAEY0lEQVRoga2a24KqMAxFI6UURO4wiIjz/395UsARJUkRTl/mgbLYJmmapgOee1zuRdJX7VADQF0PbdUnxf2y4UVwTUiTMjY6jLRSyAYFSuko1CYuk/QgPIgN6Jm7HPgFDSYO9sOvpQn1irv4gg5Ned0Fv1YmEsgzPzIVj+fg1ziSRC/l65jD0/C0h23oCQ897VsSHgxrF4p4lZOuJeBp6bb1Ch+dCfFr+L3V36Lt0O2avoIn9S420uvEBW+6r03yHEo1MrwBnq3msZ3+DmddifmkM3n++5vnpmNXgIpKHt5EDDkcbo8kyMYRJI/bwKWFqOHgjE1UfctOJx/H6fT8m91ovytoaHhCmlPBLZuwy+H72Y2UorqEgqc1OVk/Tiv0iD89SNOo+r6Gp+TaUXVAokd8QspZrKY/+Jlkq4ZlI72hDKlU+QkPyEDRPwIb6T+kV6PgHZ7mdGjxRhnhAfmSytM3eEM6R/9IaBxFS/r0uVIn+JWOcN2LwlF6T0d7XSzgMZ0Ju4cL/ujIF3X1gl/pxayMbHJrdEO/GRV/8IoWrky2Ez5Lt/ArM2O/cny1mOElnQyPwGFMvhbOTTgCV+YywoOQfn4IDmEwwpk4PAjXsYWn7PNDcGVShCfM04NwgAThJVunHIPr0oMLa/Kj8PgCd/6xyjOZjRs1k6rt28MdCr5WDl15y2YuLo4x8RaQ8E8HJxvpA68tgZ5Z+2i02xb4jXVZVAKTES38vAVObuyzOCA3qv8CVy3wNjsMz6Hmnh2GgwG+2D+svAZ6h/0vyjsJfjAURbhqt8D5aEOz8A7Fms+9/OkacxoG+MyD6z9wsvlItqHI/yybNR3ss7BX2EUkOARdIuZcPxBbBLj8uaJlHHLS9c/igRgTF59ywRUw2a8IDwNps7BDqBb9Ru4S4GYhbHN2grBKfVm43eaEDRrEPdpvJINOG7RQWoxTWOmFsELGN0uxKJoGY3VHqGAY26LoIhodz6w026XJlrlSITpNAvLUVQjrfhIVyyX0TCeXKb+vz2MuoR12wWmE9B+H8Gfxzx5bnnDKpS7437GlkKXvgb8OXJ6YGXfBX0dFrxDtsge+OORyp9x54vfw5fHcK4RWJRmKvihHdcvGgtfwcF2t2bhAxSuBflMzh+9ytbyfPps5TBsKjwd1QjfnspbVrj/aUB6deXV95rYi/9TnNF6fV905ovWnozhY9ysX4vuO6P1Srb9V01J1LdEK/VBf5p/VBdm09HDXWMxTUcu0Qt/xRTm8qVdAtluXjWKlTVNsKEMnfP1S/95CJ1vcejhvUP0yTj88Xcu3uG3I4CSt2RDh8Flfj8aRmvPWMhoqlx8JOroW1cvXCkjPm6/Rs/oKHBcinnffhR7H/ZNF3HDtpPtrEnU3l+5hU1d/5MXf5WvxPnklzdyHfimeuY3mLlsvX+BT7iZduIPeGJKEIzfA0Tjucyir2gm31pFuW0SyGz7yqQ/4qYu8CT5+wH7h724OuVv+GcLz/gEjAT9K7FAvxQAAAABJRU5ErkJggg==" alt="user photo">
        </button>
        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
            <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
                <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
            </li>
            <li>
            <form action="{{ route('logout') }}" method="POST" >
                @csrf
               <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();this.closest('form').submit();" 
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
            </form>
            </li>
            </ul>
        </div>
      @endauth
      <div class="ml-4">
        @include('components.toggle')
      </div>
      
      <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      <li>
        <a 
          class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Juegos</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Mazos</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Cartas</a>
      </li>
      <li>
        <a href="{{ route('about') }}" 
          class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Acerca de</a>
      </li>
    </ul>
  </div>
  </div>
</nav>

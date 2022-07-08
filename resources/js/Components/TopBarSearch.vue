<template>
  <li class="d-none d-lg-block">
    <form class="app-search">
      <div class="app-search-box dropdown">
        <div class="input-group">
          <input
            type="search"
            class="form-control"
            placeholder="Search..."
            id="top-search"
          />

          <button class="btn" type="submit">
            <i class="fe-search"></i>
          </button>
        </div>
      </div>
    </form>
  </li>
  <li class="dropdown d-inline-block d-lg-none">
    <a
      class="nav-link dropdown-toggle arrow-none waves-effect waves-light"
      data-bs-toggle="dropdown"
      href="#"
      role="button"
      aria-haspopup="false"
      aria-expanded="false"
    >
      <i class="fe-search noti-icon"></i>
    </a>
    <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
      <form class="p-3">
        <input
          type="text"
          class="form-control"
          placeholder="Search ..."
          aria-label="Search"
        />
      </form>
    </div>
  </li>
</template>

<template>
  <div class="container-fluid">
    <div class="row">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <router-link :to="{name:'news'}" class="navbar-brand">News</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                  <router-link class="nav-link" :to="{name:'news'}">ホーム<span class="sr-only">(current)</span></router-link>
                </li>

                <li class="nav-item">
                  <router-link class="nav-link" :to="{name:'news'}">ニュース一覧</router-link>
                </li>

                <li class="nav-item">
                  <router-link class="nav-link" :to="{name:'create'}">ニュース作成</router-link>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/dashboard/logout">ログアウト</a>
                </li>

              </ul>

            </div>
          </nav>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
				
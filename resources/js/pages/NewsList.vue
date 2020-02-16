<template>
  <div>
    <Header></Header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

              <div class="form-group">
                <label for="search">リアルタイム検索</label>
                <input type="email" v-model="search" class="form-control" id="search" placeholder="キーワードを入力してください">
              </div>

              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">タイトル</th>
                      <th scope="col">ステータス</th>
                      <th scope="col">作成時間</th>
                      <th scope="col">操作</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="_news in news">
                      <th scope="row">{{_news.id}}</th>
                      <td>{{_news.title}}</td>
                      <td>{{_news.id}}</td>
                      <td>{{_news.created_at}}</td>
                      <td>
                        <router-link :to="{name: 'edit', params: {id: _news.id}}" class="btn btn-primary btn-sm">編集</router-link>
                        <button type="button" @click="remove(_news)" class="btn btn-danger btn-sm">削除</button>
                      </td>
                    </tr>

                  </tbody>
               </table>
            </div>
        </div>
    </div>

  </div>
</template>

<script>
import Header from '../components/HeaderMenu'
export default {
    components: {
         Header
    },
    data() {
       return {
         search: '',
         news: []
       }
    },
    watch: {
      search: function (search) {
          this.getList(search)
      }
    },
    mounted() {

      this.getList('')
    },
    methods:{
      getList(search){
        const self = this
        axios.get('/api/news/list?search='+search)
          .then(function(response){
            self.news = response.data.response
          }).catch(function(error){
            alert('error: '+error)
          })
      },
      remove(news){
        if (confirm('削除しますか？') == false) {
          return ;
        }
        const self = this
        axios.delete('/api/news/'+news.id+'/')
          .then(function(response){
            alert('削除されました。')
            var index = self.news.indexOf(news);
            if (index !== -1) self.news.splice(index, 1);
          }).catch(function(error){
            alert('error: '+error)
          })
      }
    }
}
</script>

				
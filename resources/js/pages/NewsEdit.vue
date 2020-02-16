<template>
  <div>
    <Header></Header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <form method="post" @submit.prevent="onSubmit">

                <div class="form-group">
                  <label for="title">タイトル</label>
                  <input type="text" class="form-control" id="title" name="news[title]" :value="news.title" placeholder="タイトルを入力してください">
                </div>

                <div class="form-group">
                  <label for="content">内容</label>
                  <textarea name="news[content]" class="form-control" id="content" rows="3" placeholder="内容を入力してください">{{news.content}}</textarea>
                </div>

                <div class="form-group">
                  <label for="status">ステータス</label>
                  <select class="form-control" id="status" name="news[status]">
                    <option value="1" :selected="news.status==1">公開</option>
                    <option value="0" :selected="news.status==0">非公開</option>
                  </select>
                </div>
                <div class="form-group row">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">保存</button>
                  </div>
                </div>
              </form>
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
         news: {}
       }
    },
    mounted() {
      var self = this
      axios.get('/api/news/'+this.$route.params.id+'/')
        .then(function(response){
          self.news = response.data.response
        }).catch(function(error){
          alert('error: ',error)
        })
    },
    methods:{
      onSubmit(e){
        const route = this.$router
        axios.put('/api/news/'+this.$route.params.id+'/', $(e.currentTarget).serialize())
          .then(function(response){
            route.push({ name: 'news' })
          }).catch(function(error){
            alert('error: ',error)
          })
      }
    }
}
</script>

					
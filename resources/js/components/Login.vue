<template>
    <div class="container h-100">
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Email</label>
                            <input type="text" v-model="user.email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Password</label>
                            <input type="password" v-model="user.password" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button @click="login" class="btn btn-success">Login</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                user:{
                    email:'',
                    password:''
                },
                logo:{
                    url:"image/logo.png",
                    alt:"Bangol"
                }
            }
        },
        methods:{
            login(){
                var data={
                    client_id: 2,
                    client_secret:'U0XFevwgPv82oyme57Yh5XBYZCi5GAacoHSkg9nc',
                    grant_type:'password',
                    username:this.user.email,
                    password:this.user.password
                };
                axios.post('/oauth/token',data)
                    .then(response => {
                    //console.log(response);
                    this.$auth.setToken('Bearer '+response.data.access_token,response.data.expires_in +Date.now())
                this.$router.push("/");
            })
            }
        }
    }
</script>
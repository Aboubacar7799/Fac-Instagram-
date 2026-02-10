<template>
    <div v-if="canFollow">
        <button class="btn btn-secondary sm" @click="followProfil" v-text="follow"></button>
    </div>
</template>

<script>

    export default{

        props:['profilId','follows','authProfilId'],

        data: function(){
            return {
                status: this.follows
            }
        },

        methods:{

            followProfil(){
                axios.post('/follows/' + this.profilId)

                    .then(response => {
                        this.status = ! this.status
                    })
                    .catch(errors => {
                        if(errors.response.status===401){
                            window.location='/login';
                        }

                })
            }
        },
        computed: {
            follow(){
                return (this.status) ? "Désabonné" : "S'abonné";
            },
            canFollow(){
                return parseInt(this.profilId) !== parseInt(this.authProfilId)
            }
        }
    }
</script>

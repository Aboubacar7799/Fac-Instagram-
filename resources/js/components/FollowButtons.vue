<template>
    <div>
        <button class="btn btn-sm ms-3" 
                :class="isFollowing ? 'btn-outline-secondary' : 'btn-primary'"
                @click="followUser" 
                v-text="buttonText">
        </button>
    </div>
</template>

<script>
export default {
    // On reçoit l'ID du profil et l'état initial depuis Blade
    props: ['profilId', 'follows'],

    data() {
        return {
            // On convertit la prop 'follows' en booléen utilisable par Vue
            isFollowing: this.follows === '1' || this.follows === true
        }
    },

    methods: {
        followUser() {
            // Appel AJAX vers la route que nous avons définie
            axios.post('/follow/' + this.profilId)
                .then(response => {
                    // On met à jour l'état local avec la réponse du contrôleur
                    this.isFollowing = response.data.attached.length > 0;
                    
                    // Optionnel : un petit message de succès
                    console.log(response.data.message);
                })
                .catch(errors => {
                    // Si l'utilisateur n'est pas connecté, Laravel renvoie une erreur 401
                    if (errors.response.status === 401) {
                        window.location = '/login';
                    }
                });
        }
    },

    computed: {
        buttonText() {
            return this.isFollowing ? 'Ne plus suivre' : 'Suivre';
        }
    }
}
</script>

<template> 
<div>
    <button @click="refresh(true)" class="btn btn-primary">Aggiorna</button>
    <button @click="newFlicker()" class="btn btn-primary">Aggiungi nuovo</button>
    <table class="table">
        <thead>
            <tr>             
                <td>immagine</td>
                <td>Titolo</td>
                <td>Sttotitolo</td>
                 <td>Azioni</td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="elem in data" :key="elem.id">
                
                <td>
                    <img :src="elem.media"  />
                </td>
                <td>
                   {{elem.title}} 
                </td>
                <td>
                     {{ localDate( elem.date_taken)   }}                   
                </td>
                <td>
                    <button @click="openModal(elem, 'show')" class="btn btn-primary">Dettagli</button>
                    <button @click="openModal(elem, 'edit')" class="btn btn-primary">Modifica</button>
                    <button @click="deleteElem(elem)" class="btn btn-primary">Elimina</button>
                </td>      
            </tr>
          
        </tbody>
    </table>
     <modal v-if="showModal" @close="showModal = false">
        <flicker-detail v-if="mode=='show'" slot="body" :detail="selected">          
        </flicker-detail>
         <flicker-form v-if="mode=='edit'" slot="body" :detail="selected">          
        </flicker-form>
      </modal>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                data:null,
                selected:null,
                showModal:false,
                mode:'show'
            }
        },
        created() {
            this.refresh();
        },
        methods: {
            refresh(refresh=false){
                var link='/api/flicker'
                if(refresh){
                    link+='/refresh'
                }
                axios.get(link)
                .then((res) =>{                   
                    this.data=res.data.data;
                })
                .catch( function(e) {
                    alert(e);
                });
            },
            openModal(selected, mode){
                this.showModal=true
                this.selected=selected
                this.mode=mode
            },
           
            localDate(date){
                return new Date(date).toLocaleString();
            },
            newFlicker(){
                this.openModal(null, 'edit')
            }

        },
        // computed: {
        //     data(){

        //     }
        // }
    }
</script>
<style>
</style>
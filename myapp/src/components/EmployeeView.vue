<template>
  <div class="hello">

    <div class="container">
    <div class="row">

        <form @submit.prevent="save"> 
  <div class="form-group">
    
    <label for="exampleInputEmail1">Adı Soyadı</label>
    <input type="text" v-model="employee.name" class="form-control" name="name" placeholder="Enter Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Adres</label>
    <input type="address" v-model="employee.address" class="form-control" name="address" placeholder="Address">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Telefon</label>
    <input type="phone" v-model="employee.mobile" class="form-control" name="mobile" placeholder="Phone">
  </div>
  <button type="submit" class="btn btn-primary">Kaydet</button>
</form>

    </div>
   
  </div>
    <!-- <h4>{{ msg }}</h4> -->
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Address</th>
          <th scope="col">Mobile</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="employee in result" :key="employee.id">
          <th scope="row">{{employee.id}}</th>
          <td>{{employee.name}}</td>
          <td>{{employee.address}}</td>
          <td>{{employee.mobile}}</td>
          <td>
            <button type="submit" class="btn btn-warning" @click="edit(employee)">Edit</button>
            <button type="submit" class="btn btn-danger" @click="remove(employee)">Sil</button>
          
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  
</template>

<script>

  window.csrf_token = "{{ csrf_token() }}"
import Vue from 'vue' // in Vue 3
import axios from 'axios'

Vue.use(axios);


export default {
  name: "EmployeeView",
  data() {
    return {
      result : {}, 

      employee: {

          id: '',
          name: '',
          address: '',
          mobile: ''

      }
    };
  }, 

   created() {

      this.employeeView();
   },
   
    methods:  {
        
         employeeView() {


             var page = "http://localhost:8000/api/employe"
             axios.get(page) 
             .then(({data})=> {


                console.log(data);

                this.result = data;
             }
             
             
             );
         }, 

         save() {
               
             if(this.employee.id == '')  {
                  this.saveData();

             }else {
              this.updateData();

             }
            

         }, 

         saveData() {

            axios.post("http://127.0.0.1:8000/api/save", this.employee)
            .then(
                
            ({data})=> {

               alert('Savedd');
            }
            
            )
         }, 
         edit(employee) {

           this.employee = employee;

         }, 

         updateData() {

          var  editrecords = 'http://localhost:8000/api/update/' + this.employee.id;
         axios.put(editrecords, this.employee) 
          
          .then(

          ({data})=> {

           this.employee.name = '';
           this.employee.address = '';
           this.employee.mobile = '';
           this.employee.id = '';
           alert('updated!!');

           this.employeeView();

          }

          )
          
         }, 

         remove(employee) {

             var url = 'http://localhost:8000/api/delete/' + employee.id;

             axios.delete(url);
             alert("Deleted");
             this.employeeView(); 

         }
    },
  

};
</script>

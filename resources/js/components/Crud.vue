<template>
	<div class="container p-4">
		<div class="row justify-content-center">

			<!-- FORM -->

			<div class="col-3">

				<div class="card">
					<div class="card-header text-center">
						<h3>Data</h3>
					</div><!-- Card Head -->
					<div class="card-body">
						<!-- Name -->
						<div class="mb-3">
							<label for="name" class="form-label">Name:</label>
							<input v-model="dato.name" type="text" class="form-control" id="name">
						</div>

						<!-- DNI -->
						<div class="mb-3">
							<label for="dni" class="form-label">DNI:</label>
							<input v-model="dato.dni" type="text" class="form-control" id="dni">
						</div>


						<div class="container">
							<div class="text-center">
								<button v-on:click="addData" class="btn btn-primary">Añadir</button>
								<button v-if="edit" v-on:click="cleanData" class="btn btn-danger">Cancelar</button>
							</div>
						</div>
					</div> <!-- Form -->
				</div><!-- Card -->
			</div><!-- Col -->

			<!-- TABLE -->
			<div class="col-6 text-center">
				<div class="card text-center">
					<div class="card-header">
						<h3>Data</h3>
					</div><!-- Card Head -->

					<div class="card-body">

						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Name</th>
									<th scope="col">DNI</th>
									<th scope="col"></th>
								</tr>
							</thead>

							<tbody>

								<tr v-for="d in datos" v-bind:key="d.id">
									<th scope="row">{{ d.id }}</th>
									<td>{{ d.name }}</td>
									<td>{{ d.dni }}</td>
									<td>
										<div class="btn-group" role="group">
											<button v-on:click="editData(d)" type="button" class="btn btn-info">Editar</button>
											<button v-on:click="deleteData(d)" type="button" class="btn btn-danger">Borrar</button>
										</div>
									</td>
								</tr>

							</tbody>
						</table><!-- Table -->
					</div><!-- Card Body -->
				</div><!-- Card -->
			</div><!-- Col -->
		</div><!-- Row -->
	</div><!-- Conainer -->


</template>

<script>
import axios from 'axios';

export default {

	data() {
		return {
			datos:[],
			dato: {
				id: '',
				name: '',
				dni: ''
			},
			edit: false,
		}
	},

	methods: {
		getData(){
			axios.get('api/get').then(r=>{
				this.datos = r.data;
			});
		},

		cleanData() {
			this.dato = {
				name: '',
				dni: ''
			};
			this.edit = false;
		},

		addData(){
			if (!this.edit) {
				axios.post('api/store', {
					name: this.dato.name,
					dni: this.dato.dni
				})
				.then(r=>this.datos = r.data)
				.catch(e=>console.log(e.response));

			} else {
				axios.post('api/update', {
					id: this.dato.id,
					name: this.dato.name,
					dni: this.dato.dni
				})
				.then(r=>this.datos = r.data)
				.catch(e=>console.log(e.response));
			};

			this.cleanData();
		},

		editData(d){
			this.dato = {
				id: d.id,
				name: d.name,
				dni: d.dni
			};
			this.edit = true;
		},

		deleteData(d){
			axios.post('api/delete',{
				id: d.id
			})
			.then(r=>this.datos = r.data)
			.catch(e=>console.log(e.response));
		},
	},

	mounted() {
		this.getData();
	},
}
</script>

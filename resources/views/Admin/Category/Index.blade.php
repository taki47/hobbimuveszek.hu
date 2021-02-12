@extends('Layouts.Admin')

@section('content')
<div class="row">
    <div class="col-12 ">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>{{ __('admin.categories.title') }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @if( Session::has('success') )
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                <div id="app">
                    <div v-if="showEditModal">
                        <transition name="modal">
                            <div class="modal-mask">
                                <div class="modal-wrapper">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Szerkesztés</h4>

                                                <button type="button" class="close" @click="showEditModal=false">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" v-model="editTitle" class="form-control"><br /><br />
                                                <button type="button" class="btn btn-sm btn-success" @click="updateItem">Módosítás</button>
                                                <button type="button" class="btn btn-sm btn-danger" @click="showEditModal=false">Mégse</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </transition>
                    </div>

                    <div id="app">
                        <div v-if="showDeleteModal">
                            <transition name="modal">
                                <div class="modal-mask">
                                    <div class="modal-wrapper">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Törlés</h4>
    
                                                    <button type="button" class="close" @click="showDeleteModal=false">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Biztosan törölni szeretnéd <strong>@{{ deleteTitle }}?</strong><br /><br />
                                                    <button type="button" class="btn btn-sm btn-danger" @click="confirmDeleteItem">Törlés</button>
                                                    <button type="button" class="btn btn-sm btn-primary" @click="showDeleteModal=false">Mégse</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>




                    <input type="hidden" ref="dbTree" value="{{ $categories }}">

                    <div class="col-12 mb-3">
                        <input type="text" ref="inputNewNode" value="" v-model="newNodeText" autofocus
                            v-on:keyup.enter="newNode">
                        <button class="btn btn-sm btn-success" @click="newNode">Új elem felvétele</button>
                    </div>

                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="updateSuccess"
                            @click="updateSuccess=false">
                            {{ __("admin.categories.updateSuccess") }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" v-if="updateFailed">
                            {{ __("admin.categories.updateFailed") }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                                @click="updateFailed=false">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <template v-if="!tree.length">
                            <h3 class="text-center">{{ __("admin.categories.emptyList") }}</h3>
                        </template>

                        <sl-vue-tree v-model="tree">
                            <template slot="title" slot-scope="{ node }">
                                <span class="item-icon">
                                    <i class="fa fa-file" v-if="node.isLeaf"></i>
                                    <i class="fa fa-folder" v-if="!node.isLeaf"></i>
                                </span>
                                @{{ node.title }}
                            </template>

                            <template slot="sidebar" slot-scope="{ node }">
                                <button class="btn btn-sm btn-primary" @click="editItem(node.path)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" @click="deleteItem(node.path)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </template>
                        </sl-vue-tree>
                    </div>

                    <button type="button" class="btn btn-success mt-3" @click="update">Módosítás</button>
                    <div class="lds-ring" v-if="spinner">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<link rel="stylesheet" href="/admin/assets/vue-tree/sl-vue-tree-dark.css">
<link rel="stylesheet" href="/admin/assets/css/vue-modal.css">
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.min.js"></script>
<script src="/admin/assets/js/axios.min.js"></script>
<script src="/admin/assets/vue-tree/sl-vue-tree.js"></script>
<script src="/admin/assets/js/vueTree.js"></script>
@endsection

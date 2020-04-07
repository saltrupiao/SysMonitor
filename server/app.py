from dao import read_all_clients
from os import path, system
from flask import Flask, jsonify, request, redirect, url_for

app = Flask(__name__)

@app.route('/perfdata', methods=['GET'])
def get_perfdata():
    return jsonify({'system_performance_data': read_all_clients()})

if __name__ == '__main__':
    app.run(debug=True)

from netinfo import retrieve_performance_data
from flask import Flask, jsonify, request, redirect, url_for

app = Flask(__name__)

@app.route('/perfdata', methods=['GET'])
def get_perfdata():
    return jsonify({'system_performance_data': retrieve_performance_data()})

if __name__ == '__main__':
    app.run(debug=True)

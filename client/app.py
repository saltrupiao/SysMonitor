from netinfo import retrieve_performance_data
from os import path, system
from flask import Flask, jsonify, request, redirect, url_for

app = Flask(__name__)

@app.route('/perfdata', methods=['GET'])
def get_perfdata():
    return jsonify({'system_performance_data': retrieve_performance_data()})

@app.route('/log/fail', methods=['GET'])
def get_fail_log():
    if path.exists('/var/log/'):
      fail_log = open('/var/log/faillog')
      return fail_log.read()
    return "Path does not exist"

if __name__ == '__main__':
    app.run(host='0.0.0.0', debug=True, port=80)
